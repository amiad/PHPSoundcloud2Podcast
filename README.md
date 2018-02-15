# PHPSoundcloud2Podcast
Convert Soundcloud playlist or user to podcast feed

[![Join the chat at https://gitter.im/PHPSoundcloud2Podcast/Lobby](https://badges.gitter.im/PHPSoundcloud2Podcast/Lobby.svg)](https://gitter.im/PHPSoundcloud2Podcast/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## Usage
### Manually Download
1. Download PHPSoundcloud2Podcast.
2. Install required dependencies with [Composer](https://getcomposer.org/):  
`$ composer install`
3. Transfer souncloud url in url parameter:  
 `http://example.com/?url=https://soundcloud.com/user/`

### Composer
1. Install soundcloud2podcast:  
`$ composer require amiad/soundcloud2podcast`
2. Create object:  

```php
require_once __DIR__.'/vendor/autoload.php';
new \Soundcloud2Podcast\Soundcloud2Podcast(url, cacheTime);
```
   - `url` **url string** Url to the souncloud page to convert.
   - `cacheTime` _optional_ **string** Time to refresh the feed cache (example: `30 minutes`). Default: 1 hour.

## License
GPL.

You can [contact me](https://gitter.im/PHPSoundcloud2Podcast/Lobby) for another license.
