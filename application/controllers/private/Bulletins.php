<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bulletins extends CI_Controller
{

    private $BASE_PATH_IMAGES = 'assets/images/bulletins/';

    public function index()
    {
        // Check organization login
        if (!$this->session->userdata('org_id') || !$this->session->userdata('org_name')) {
            redirect('private/organizations/index');
        }

        $data['title'] = 'Boletins';
        $data['bulletins'] = $this->bulletins_model->getAll($this->session->userdata('org_id'));
        $this->load->view('templates/header');
        $this->load->view('bulletins/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($bul_id = null) 
	{
		if (!$bul_id || !is_numeric($bul_id)) {
			show_404();
		}
		
		$data['title'] = 'Boletim';
		$data['bul'] = $this->bulletins_model->getBulletin($bul_id, true);
		
		if (!$data['bul']) {
            show_404();
        }

        $data['sections'] = $this->sections_model->getAll($bul_id);		

		$this->load->view('templates/header');
		$this->load->view('bulletins/view', $data);
		$this->load->view('templates/footer');
	}

    public function create()
    {
        $data['title'] = 'Novo boletim';

        $this->load->view('templates/header');
        $this->load->view('bulletins/create', $data);
        $this->load->view('templates/footer');
    }

    public function entry($bul_id = null)
    {
        if (!$bul_id || !is_numeric($bul_id)) {
            show_404();
        }

        $data['bulletin'] = $this->bulletins_model->getBulletin($bul_id);
        if (!$data['bulletin']) {
            show_404();
        }

        $this->session->set_userdata('bul_id', $data['bulletin']->id);
        $this->session->set_userdata('bul_title', $data['bulletin']->title);

        redirect('private/sections/index');
    }

    public function notify_users($bul_id = null)
    {
        if (!$bul_id || !is_numeric($bul_id)) {
            show_404();
        }

        $data['bulletin'] = $this->bulletins_model->getBulletin($bul_id);
        if (!$data['bulletin']) {
            show_404();
        }

        // Check organization login
        if (!$this->session->userdata('org_id') || !$this->session->userdata('org_name')) {
            redirect('private/organizations/index');
        }

        users_notification($this->session->userdata('org_name'), $this->session->userdata('org_id'), $bul_id);

        redirect('private/sections/index');
    }

    public function duplicate($bul_id = null)
    {
        if (!$bul_id || !is_numeric($bul_id)) {
            show_404();
        }

        $data['bulletin'] = $this->bulletins_model->getBulletin($bul_id);
        if (!$data['bulletin']) {
            show_404();
        }

        $data['bulletin']->id = null;
        $data['bulletin']->created_at = (new DateTime)->format('Y-m-d H:i:s');
        $data['bulletin']->published = false;
        $this->bulletins_model->save($data['bulletin']);

        $new_bulletin_id = $this->db->insert_id();

        $sections = $this->sections_model->getAll($bul_id);
        foreach($sections as $sec) {
            $sec_obj = (object) $sec;
            $sec_obj->id = null;
            $sec_obj->bulletin_id = $new_bulletin_id;
            $this->sections_model->save($sec_obj);
        }

        redirect('private/bulletins/index');
    }

    public function exit_bul()
    {
        $this->session->unset_userdata('bul_id');
        $this->session->unset_userdata('bul_title');
        $this->index();
    }

    public function publish($bul_id = null)
    {
        if (!$bul_id || !is_numeric($bul_id)) {
            show_404();
        }

        $data['bulletin'] = $this->bulletins_model->getBulletin($bul_id);
        if (!$data['bulletin']) {
            show_404();
        }

        $data['bulletin']->published = !($data['bulletin']->published);
        $this->bulletins_model->save($data['bulletin']);

        redirect('private/bulletins/index');
    }

    public function edit($bul_id = NULL) 
	{
		if (!$bul_id || !is_numeric($bul_id)) {
			show_404();
		}
		
		$data['bul'] = $this->bulletins_model->getBulletin($bul_id);
		if (!$data['bul']) {
			show_404();
		}

		$data['title'] = 'Editar boletim';
		$this->load->view('templates/header');
		$this->load->view('bulletins/edit', $data);
		$this->load->view('templates/footer');
	}

    public function save()
    {
        $this->form_validation->set_rules('title', 'Título do Boletim', 'required|min_length[3]', array(
            'required' => 'Você deve informar o %s.',
            'min_length' => 'O %s deve conter pelo menos %d caracteres.',
        ));
        if ($this->form_validation->run() === false) {
            if ($this->input->post('id')) {
				$this->edit($this->input->post('id'));
			} else {
				$this->create();
			}
        } else {
            // Upload Image
            $config['upload_path'] = './' . $this->BASE_PATH_IMAGES;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1024';
            $config['max_width'] = '2000';
            $config['file_name'] = 'BUL_ORG_'.$this->session->userdata('org_id').'_'.(new DateTime)->format('YmdHis');
            $config['max_height'] = '2000';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $data = array('upload_data' => $this->upload->data());
                $image_path = base_url() . $this->BASE_PATH_IMAGES . $data['upload_data']['file_name'];
                $this->bulletins_model->save($this->getBulletinFromInput($image_path));
            } else {
                if ($this->input->post('image_path')) {
                    $this->bulletins_model->save($this->getBulletinFromInput($this->input->post('image_path')));
				} else {
					$image_path = base_url() . $this->BASE_PATH_IMAGES . 'noimage.png';
                    $this->bulletins_model->save($this->getBulletinFromInput($image_path));
				}	                             
            }

            // Update last_update field of organization
            $organization = $this->organizations_model->getOrganization(
                $this->session->userdata('org_id'));
            if (!$organization) {
                show_404();
            }

            $organization->last_updated = (new DateTime)->format('Y-m-d H:i:s');
            $this->organizations_model->save($organization);
            redirect('private/bulletins/index');
        }
    }

    private function getBulletinFromInput($image_path)
    {
        $bulletin = new stdClass();
        if ($this->input->post('id')) {
			$bulletin->id = $this->input->post('id');
		} else {
			$bulletin->id = null;
		}
        $bulletin->title = $this->input->post('title');
        $bulletin->subtitle = $this->input->post('subtitle');
        $bulletin->created_at = (new DateTime)->format('Y-m-d H:i:s');
        $bulletin->organization_id = $this->session->userdata('org_id');
        $bulletin->image = $image_path;
        return $bulletin;
    }
}
