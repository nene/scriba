# Scriba homepage

## System requirements

- PHP 5.3 (that's what's running in virtuaal.com)
- Grunt (NodeJS build tool)

## Setup

Create a `config.php` file based on `config_example.php` and configure
the `base_url` inside it to point to the root of the website.  For
example:

    <?php
    return array(
        "base_url" => "http://scriba.ee",
    );

### Setup Grunt

Install the Grunt command line interface:

    $ npm install -g grunt-cli

Install local Grunt runner and all other NodeJS dependencies locally.
Just `cd` to project root directory and execute:

    $ npm install

### Build the app

Now that Grunt and NodeJS modules are set up, we can build all the
assets of our app by just running the default task:

    $ grunt


## Images

- http://www.flickr.com/photos/49333775@N00/5489312169
  images/flickr-broken-book.jpg

- http://www.flickr.com/photos/chanycrystal/2126955281
  images/flickr-arabic.jpg

- http://www.flickr.com/photos/pixagraphic/3414730395
  images/flickr-old-books.jpg

- http://www.flickr.com/photos/hoshi7/5561228178
  images/flickr-measure.jpg

- http://www.flickr.com/photos/31433424@N00/3221166562
  images/flickr-multi-measure.jpg

- http://www.flickr.com/photos/polandmfa/4862870480
  images/flickr-agreement.jpg

- http://www.flickr.com/photos/8536261@N07/6140792529
  images/flickr-document.jpg

- http://www.flickr.com/photos/53326337@N00/2021672445
  images/flickr-grading.jpg

- http://www.flickr.com/photos/99887995@N00/4762384399
  images/flickr-writing.jpg

- http://www.flickr.com/photos/46944516@N00/7989807751
  images/flickr-mouth.jpg

- http://www.flickr.com/photos/glynlowe/8495349404
  images/flickr-reference.jpg

- http://www.flickr.com/photos/nicmcphee/2756494307
  images/flickr-grading2.jpg

- http://www.flickr.com/photos/joybot/6310306480
  images/flickr-notary.jpg

- http://www.flickr.com/photos/redjoe/2670529778
  images/flickr-apostille.jpg

- http://www.flickr.com/photos/mkhmarketing/8468788107
  images/flickr-social.jpg

- http://www.flickr.com/photos/tallkev/256810217
  images/flickr-gears.jpg

- http://www.flickr.com/photos/atomicjeep/73248430
  images/flickr-cinema.jpg

- http://www.flickr.com/photos/peterme/1253748873
  images/flickr-manual.jpg

- http://openiconlibrary.sourceforge.net/gallery2/?./Icons/status/dialog-error.png
  images/dialog-error.png
