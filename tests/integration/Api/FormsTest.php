<?php

namespace Fungku\HubSpot\Tests\Integration\Api;

use Fungku\HubSpot\Api\Forms;
use Fungku\HubSpot\Http\Client;

class FormsTest extends \PHPUnit_Framework_TestCase
{
    private $forms;

    public function setUp()
    {
        parent::setUp();
        $this->forms = new Forms('demo', new Client());
        sleep(1);
    }

    /*
     * Lots of tests need an existing object to modify.
     */
    private function createForm()
    {
        sleep(1);

        $response = $this->forms->create([
            "name" => "Test Form " . uniqid(),
            "action" => "",
            "method" => "POST",
            "cssClass" => "hs-form stacked",
            "redirect" => "",
            "submitText" => "Sign Up",
            "followUpId" => "",
            "leadNurturingCampaignId" => "",
            "notifyRecipients" => "",
            "embeddedCode" => "",
            "fields" => [
                [
                    "name" => "firstname",
                    "label" => "First Name",
                    "description" => "",
                    "groupName" => "contactinformation",
                    "type" => "string",
                    "fieldType" => "text",
                    "displayOrder" => 1,
                    "required" => true,
                    "enabled" => true,
                    "hidden" => false,
                    "defaultValue" => "",
                    "isSmartField" => false,
                    "validation" => [
                        "name" => "",
                        "message" => ""
                    ],
                ],
            ],
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        return $response;
    }

    /** @test */
    public function all_with_no_params()
    {
        $response = $this->forms->all();

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function update()
    {
        $form = $this->createForm();

        $response = $this->forms->update($form->guid, [
            'name' => 'new name ' . uniqid(),
        ]);

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function getById()
    {
        $form = $this->createForm();

        $response = $this->forms->getById($form->guid);

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function delete()
    {
        $form = $this->createForm();

        $reponse = $this->forms->delete($form->guid);

        $this->assertEquals(204, $reponse->getStatusCode());
    }

    /** @test */
    public function getFields()
    {
        $form = $this->createForm();

        $response = $this->forms->getFields($form->guid);

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function getFieldByName()
    {
        $form = $this->createForm();

        $response = $this->forms->getFieldByName($form->guid, 'firstname');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
