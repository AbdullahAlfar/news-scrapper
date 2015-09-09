# News Scrappy
This library extract article information  in a webpage including:
title, description, author, keywords, publish data and body (if possible)...

This library supports scrapping using several standard structured meta data, like:
[Microdata][schemaorgspec], [hAtom Microformat][hatomspec], [Open Graph][ogspec] and [standard html metadata][htmlmetaspec].

News-Scrapper requires PHP >= 5.4
[![Build Status](https://travis-ci.org/zrashwani/news-scrapper.svg?branch=master)](https://travis-ci.org/zrashwani/news-scrapper)

## How to Install
You can install this library with [Composer][composer]. Drop this into your `composer.json`
manifest file:

    {
        "require": {
            "zrashwani/news-scrapper": "dev-master"
        }
    }
	
Then run `composer install`.

## Getting Started

Here's a quick how to scrap news data from a webpage:	

    <?php
    require 'vendor/autoload.php';

    // Initiate scrapper
    $scrap_client = new \Zrashwani\NewsScrapper\Client();    
	print_r($scrap_client->getLinkData($url));
	
Scrapper tries to guess the best structured data adapter and apply it. You can select a specific adapter to be used for extracting the data as following:

    <?php
    require 'vendor/autoload.php';

    // Initiate scrapper
    $scrap_client = new \Zrashwani\NewsScrapper\Client('Microdata');    
	print_r($scrap_client->getLinkData($url));	
	
Here is the list of supported adapters or scrapping modes:
* Microdata
* HAtom
* OpenGraph
* Default

## How to Contribute

1. Fork this repository
2. Create a new branch for each feature or improvement
3. Send a pull request from each feature branch

It is very important to separate new features or improvements into separate feature branches,
and to send a pull request for each branch. This allows me to review and pull in new features
or improvements individually.

All pull requests must adhere to the [PSR-2 standard][psr2].

## System Requirements

* PHP 5.4.0+


## License

MIT Public License

[schemaorgspec]: http://schema.org/Article
[psr2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[hatomspec]: http://microformats.org/wiki/hatom
[ogspec]: http://ogp.me/
[htmlmetaspec]: http://www.w3.org/TR/html5/document-metadata.html#standard-metadata-names