<?php

namespace App\Controllers;

use App\Models\EmailModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Email extends BaseController
{
    public function index()
    {
        $model = model(EmailModel::class);

        $data = [
            'email' => $model->getEmail(),
        ];

        return view('templates/header', $data)
            . view('email/index', $data)
            . view('templates/footer');
    }

    public function view($id = null)
    {
        $model = model(EmailModel::class);

        $email = $model->getEmail($id);

        if (empty($email)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the email: ' . $id);
        }

        $data = [
            'email' => $email,
        ];

        return view('templates/header', $data)
            . view('email/view', $data)
            . view('templates/footer');
    }


    public function create()
    {
        helper('form');

        // Check if the form is submitted.
        if (! $this->request->getMethod() === 'post') {
            // The form is not submitted, so return the form.
            return view('templates/header', ['title' => 'Create an email'])
                . view('email/email_create')
                . view('templates/footer');
        }

        $data = [
            'sender_email' => $this->request->getPost('sender_email'),
            'receiver_email' => $this->request->getPost('receiver_email'),
            'message' => $this->request->getPost('message')
        ];

        // Perform validation
        if (! $this->validate([
            'sender_email' => 'required|valid_email',
            'receiver_email' => 'required|valid_email',
            'message' => 'required'
        ])) {
            // Validation failed, so return the form with errors.
            return view('templates/header', ['title' => 'Create an email'])
                . view('email/email_create', ['validation' => $this->validator])
                . view('templates/footer');
        }

        $emailModel = new EmailModel();

        if ($emailModel->insert($data)) {
            // Email created successfully.
            return redirect()->to('/email/view');
        } else {
            // Failed to create email.
            $data['error'] = 'Failed to create email.';
            return view('templates/header', ['title' => 'Create an email'])
                . view('email/email_create', $data)
                . view('templates/footer');
        }
    }

    public function edit($id)
    {
        $model = model(EmailModel::class);
        $email = $model->get_email_by_id($id);

        if (empty($email)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the email: ' . $id);
        }

        // Pass the email data to the view for editing
        $data = [
            'email' => $email,
        ];

        return view('templates/header', $data)
            . view('email/email_edit', $data)
            . view('templates/footer');
    }

    public function update($id)
    {
        $model = model(EmailModel::class);
    
        // Retrieve the updated data from the form
        $data = [
            'sender_email' => $this->request->getPost('sender_email'),
            'receiver_email' => $this->request->getPost('receiver_email'),
            'message' => $this->request->getPost('message')
        ];
    
        // Perform validation
        if (! $this->validate([
            'sender_email' => 'required|valid_email',
            'receiver_email' => 'required|valid_email',
            'message' => 'required'
        ])) {
            // Validation failed, so return the form with errors.
            return view('templates/header', ['title' => 'Edit email'])
                . view('email/email_edit', ['validation' => $this->validator, 'email' => $data])
                . view('templates/footer');
        }
    
        // Update the email data in the database
        if ($model->update($id, $data)) {
            // Email updated successfully.
            return redirect()->to('/email/view');
        } else {
            // Failed to update email.
            $data['error'] = 'Failed to update email.';
            return view('templates/header', ['title' => 'Edit email'])
                . view('email/email_edit', $data)
                . view('templates/footer');
        }
    }
    

    public function delete($id)
    {
        $model = model(EmailModel::class);

        // Delete the email from the database
        $model->delete($id);

        return redirect()->to('/email/view');
    }


}