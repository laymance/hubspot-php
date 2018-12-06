<?php

namespace SevenShores\Hubspot\Resources;

class CrmProperties extends Resource
{
    /**
     * Retrieve a CRM object
     * 
     * @param string $object_type
     *
     * @return \SevenShores\Hubspot\Http\Response
     */
    public function all($object_type)
    {
        $endpoint = "https://api.hubapi.com/properties/v2/{$object_type}/properties";

        return $this->client->request('get', $endpoint);
    }

    /**
     * Create a CRM object property.
     *
     *
     * @see https://developers.hubspot.com/docs/methods/crm-properties/create-property
     *
     * @param string $object_type
     * @param array $property
     * @return \SevenShores\Hubspot\Http\Response
     */
    function create($object_type, $property)
    {
        $endpoint = "https://api.hubapi.com/properties/v2/{$object_type}/properties";

        $options['json'] = $property;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * Update a CRM object property.
     *
     *
     * @see https://developers.hubspot.com/docs/methods/crm-properties/update-property
     *
     * @param string $object_type
     * @param string $property_name
     * @param array $property
     * @return \SevenShores\Hubspot\Http\Response
     */
    function update($object_type, $property_name, $property)
    {
        $endpoint = "https://api.hubapi.com/properties/v2/{$object_type}/properties/named/{$property_name}";

        $options['json'] = $property;

        return $this->client->request('put', $endpoint, $options);
    }

    /**
     * Delete a CRM object property.
     *
     *
     * @see https://developers.hubspot.com/docs/methods/crm-properties/delete-property
     *
     * @param string $object_type
     * @param string $property_name
     * @return \SevenShores\Hubspot\Http\Response
     */
    function delete($object_type, $property_name)
    {
        $endpoint = "https://api.hubapi.com/properties/v2/{$object_type}/properties/named/{$property_name}";
        
        return $this->client->request('delete', $endpoint);
    }

    /**
     * Retrieve all CRM object property groups
     * 
     * @param string $object_type
     *
     * @return \SevenShores\Hubspot\Http\Response
     */
    public function getGroups($object_type)
    {
        $endpoint = "https://api.hubapi.com/properties/v2/{$object_type}/groups";

        return $this->client->request('get', $endpoint);
    }

    /**
     * Create a CRM object property group.
     *
     *
     * @see https://developers.hubspot.com/docs/methods/crm-properties/create-property-group
     *
     * @param string $object_type
     * @param array $property
     * @return \SevenShores\Hubspot\Http\Response
     */
    function createGroup($object_type, $property)
    {
        $endpoint = "https://api.hubapi.com/properties/v2/{$object_type}/groups";

        $options['json'] = $property;

        return $this->client->request('post', $endpoint, $options);
    }

    /**
     * Update a CRM object property group.
     *
     *
     * @see https://developers.hubspot.com/docs/methods/crm-properties/udpate-property-group
     *
     * @param string $object_type
     * @param string $group_name
     * @param array $property
     * @return \SevenShores\Hubspot\Http\Response
     */
    function updateGroup($object_type, $group_name, $property)
    {
        $endpoint = "https://api.hubapi.com/properties/v2/{$object_type}/groups/named/{$group_name}";

        $options['json'] = $property;

        return $this->client->request('put', $endpoint, $options);
    }

    /**
     * Delete a CRM object property group.
     *
     *
     * @see https://developers.hubspot.com/docs/methods/crm-properties/delete-property-group
     *
     * @param string $object_type
     * @param string $group_name
     * @return \SevenShores\Hubspot\Http\Response
     */
    function deleteGroup($object_type, $group_name)
    {
        $endpoint = "https://api.hubapi.com/properties/v2/{$object_type}/groups/named/{$group_name}";

        return $this->client->request('delete', $endpoint, $options);
    }
}