# PHPSoundcloud2Podcast
Convert Soundcloud playlist or user to podcast feed

[![Join the chat at https://gitter.im/PHPSoundcloud2Podcast/Lobby](https://badges.gitter.im/PHPSoundcloud2Podcast/Lobby.svg)](https://gitter.im/PHPSoundcloud2Podcast/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge) 
[![xscode](https://img.shields.io/badge/Available%20on-xs%3Acode-blue?style=?style=plastic&logo=appveyor&logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAZQTFRF////////VXz1bAAAAAJ0Uk5T/wDltzBKAAAAlUlEQVR42uzXSwqAMAwE0Mn9L+3Ggtgkk35QwcnSJo9S+yGwM9DCooCbgn4YrJ4CIPUcQF7/XSBbx2TEz4sAZ2q1RAECBAiYBlCtvwN+KiYAlG7UDGj59MViT9hOwEqAhYCtAsUZvL6I6W8c2wcbd+LIWSCHSTeSAAECngN4xxIDSK9f4B9t377Wd7H5Nt7/Xz8eAgwAvesLRjYYPuUAAAAASUVORK5CYII=)](https://cp.xscode.com/amiad/PHPSoundcloud2Podcast)

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

An MIT licensed version is available on [xs:code](http://cp.xscode.com/amiad/PHPSoundcloud2Podcast).
