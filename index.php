<?php 
    use GuzzleHttp\Client;
    require_once 'vendor/autoload.php';

    //Endpoint To The PGOAPI Max CP API.
    const POGOAPI_MAX_CP_URL = 'https://pogoapi.net/api/v1/pokemon_max_cp.json';

    //Set Default Form.
    const DEFAULT_POKEMON_FORM = 'Normal';

    //Final Array For The Pokemon Collection.
    $pokemonCollection = array();

    if (class_exists('\GuzzleHttp\Client')){

        $client = new Client();
        $response = $client->request('GET', POGOAPI_MAX_CP_URL);	
        
        //Was the request successful?
        if ($response->getStatusCode() == 200) {

            //Make sure the response returns without any JSON encoding errors. 
            if (json_last_error() === JSON_ERROR_NONE) {

                //JSON Data From Request.
                $fetchedPokemonCollection = json_decode($response->getBody()->getContents());

                //Iterate over the Pokemon.
                foreach ($fetchedPokemonCollection AS $key => $pokemon){
                    if ($pokemon->form == DEFAULT_POKEMON_FORM){
                        $pokemonCollection[] = array(
                            'id' => $pokemon->pokemon_id,
                            'name' => $pokemon->pokemon_name,
                            'max_cp' => $pokemon->max_cp
                        );
                    }
                }
            }
        } else {
            echo 'Request to the endpoint ' . MAX_CP_URL . ' was not successful. Error ' . $response->getStatusCode();
        }

    } else {
        echo 'Guzzle Is Not Installed.';
    }