# Pokemon Go Max CP Pokedex

A simple PHP script that retrieves and processes data from the [Pokemon Max CP API](https://pogoapi.net/).

## Requirements

- PHP 7.0 or later
- [Guzzle HTTP client](https://docs.guzzlephp.org/en/stable/overview.html)

## Installation

1. Clone or download the repository.
2. Install the required dependencies with [Composer](https://getcomposer.org/): `composer install`
3. Run the script in a web server or from the command line: `php index.php`

## Usage

The script retrieves data from the API endpoint and processes it to generate an array of Pokemon with their max CP. By default, it retrieves only Pokemon with the "Normal" form, but this can be changed by modifying the `DEFAULT_POKEMON_FORM` constant in the script.

The final result is stored in the `$pokemonCollection` array, which can be used to display the data in any desired format.

## Credits

- [Guzzle HTTP client](https://docs.guzzlephp.org/en/stable/overview.html)
- [PokgpAPI](https://pogoapi.net/)
