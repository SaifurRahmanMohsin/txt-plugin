# [Txt Plugin](https://github.com/SaifurRahmanMohsin/Txt-Plugin) #
Txt Generator plugin for OctoberCMS

[![development](https://img.shields.io/badge/state-Ready-red.svg)](https://img.shields.io/badge/state-Ready-red.svg)
[![platform](https://img.shields.io/badge/platform-October%20CMS-orange.svg)](https://img.shields.io/badge/platform-October%20CMS-orange.svg)

## What is it ##
As the title says, it allows you to generate [humans.txt](http://humanstxt.org/Standard.html) and [robots.txt](http://www.robotstxt.org/orig.html) for your web app.

## Installation ##
#### MarketPlace Installation ####
You can use the plugin code **Mohsin.Txt** in your October backend to get this plugin. Enjoy!!!

#### Manual Installation ####
Some advanced users might prefer to use manually install the plugin. Fire up your terminal and `cd` into your OctoberCMS project folder and paste this:
```
[ -f artisan ] && cd plugins
mkdir -p mohsin && cd $_
wget https://github.com/SaifurRahmanMohsin/Txt-Plugin/archive/master.zip
[ -f master ] && unzip master || unzip master.zip && rm $_
mv Txt-Plugin-master txt && cd $_
composer up

```
Logout from your backend and login again. This will create the necessary tables for the plugin to work. You have now installed **Txt**! Enjoy!!!

## Thanks ##
[Alexey Bobkov and Samuel Georges](http://octobercms.com) for OctoberCMS.

[Scott Bedard](https://github.com/scottbedard) for HasMany Widget.
