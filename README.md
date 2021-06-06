# IRPG Website
[![GitHub Workflow Status](https://img.shields.io/github/workflow/status/adamus1red/idlerpg-site/Docker%20Publish/master?style=for-the-badge)](https://github.com/adamus1red/docker-hopm/actions)
[![Docker Pulls](https://img.shields.io/docker/pulls/adamus1red/idlerpg?style=for-the-badge)](https://hub.docker.com/r/adamus1red/idlerpg)
[![Docker Image Size (tag)](https://img.shields.io/docker/image-size/adamus1red/idlerpg/latest?style=for-the-badge)](https://hub.docker.com/r/adamus1red/idlerpg/tags)
[![GitHub](https://img.shields.io/github/license/adamus1red/idlerpg-site?style=for-the-badge)](https://github.com/adamus1red/idlerpg-site)

# Notes
Based on IRPG Website v0.5 from http://idlerpg.net

# Installation from Source

1. Make sure you have the bot functional and running.
2. Copy all the files here to your public_html or some folder.
3. Edit config.php with your favorite editor.
4. chmod 644 * && chmod 666 hits.db
5. If you change the default settings in the IRPG bot (for example, if you turn
   off the option to write quest info to file, you'll have to manually edit
   some scripts to take this into account. If you disable the INFO command,
   you might want to remove it from the index.php page.
6. Some code in this package requires that your system have GD 2.0+ (or have it
   enabled in your php.ini, on Win32). If you don't want this functionality to
   be available, edit the script playerview.php to remove the use of the map
   and header.php to remove the links to the world map and the quest info page.
   You can also delete the worldmap.php, makeworldmap.php, makemap.php,
   quest.php, and makequestmap.php scripts.
7. Edit the website ANY WAY you see fit. You don't have to keep all of the links
   to me, I just thought they might be useful or interesting to users :^)

# Docker

The latest release of the site is available as a docker container 

`docker run --name=idlerpg-site -ti -v $(pwd):/config -p 8000:80 adamus1red/idlerpg:latest`

or if you prefer docker-compose 
```
version: '3.3'
services:
    idlerpg:
        container_name: idlerpg-site
        volumes:
            - '$(pwd):/config'
        ports:
            - '8000:80'
        image: 'adamus1red/idlerpg:latest'
```



