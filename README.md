# Berlinger API Cacher

## The goald 

The goal is

- upload csv file with data
- to retrieve images from flickr and store some meta data and a picture on the local server.
- to show an image and its data

## CSV DATA

The enduser will be to able to upload csv files with some data. The file must have `|` separated values.

### Usage

Make sure you have acces to the Flickr API.

Add the following line to the `.env` file:

`APP_FLICKR_KEY=`"<ENTER_KEY_HERE>"

Run the following commands

```terminal
Run composer update
```

```terminal
php artisan migrate
```

```terminal
php artisan serve
```

et voila! Have fun. 