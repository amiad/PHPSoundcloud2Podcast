# PHPSoundcloud2Podcast
Convert Soundcloud playlist or user to podcast feed

[![Join the chat at https://gitter.im/PHPSoundcloud2Podcast/Lobby](https://badges.gitter.im/PHPSoundcloud2Podcast/Lobby.svg)](https://gitter.im/PHPSoundcloud2Podcast/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## Installaion
1. Download PHPSoundcloud2Podcast.
2. Install required dependencies with [Composer](https://getcomposer.org/):  
`$ composer install`

# Usage
two options:
- Transfer souncloud url in url parameter:  
http://<i></i>example.com/?url=https:<i></i>//soundcloud.com/user/
- Create new object with the url:  
```
require_once 'Soundcloud2Podcast.php';
new Soundcloud2Podcast('https://soundcloud.com/user/');
```

## License
GPL.

You can [contact me](https://gitter.im/PHPSoundcloud2Podcast/Lobby) for another license.
