# PHPSoundcloud2Podcast

[![Join the chat at https://gitter.im/PHPSoundcloud2Podcast/Lobby](https://badges.gitter.im/PHPSoundcloud2Podcast/Lobby.svg)](https://gitter.im/PHPSoundcloud2Podcast/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
Convert Soundcloud playlist or user to podcast feed

## Installaion
1. Download PHPSoundcloud2Podcast.
2. Install required dependencies with [Composer](https://getcomposer.org/):  
`$ composer install`
3. two options:
    1. Transfer souncloud url in url parameter:  
http://<i></i>example.com/?url=https:<i></i>//soundcloud.com/user/
    2. Create new object with the url:  
```
require_once 'Soundcloud2Podcast.php';
new Soundcloud2Podcast('https://soundcloud.com/user/');
```

## License
GPL.

You can contact me for another license.
