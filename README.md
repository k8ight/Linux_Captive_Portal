# Captive-Portal
Linux Based isp grade captive portal

# Setup 
run cmd: debian(>9)/ubuntu(>19.04):apt install nginx php php-cgi php-mbstring php-mysql mariadb-server cockpit-networkmanager --no-install-recommends cokcpit

technituim dhcp dns(optional) required download:https://technitium.com/dns/
then copy  all files to /var/www/html

after it copy nginx folder from  /var/www/html/systemd folder to /etc (replace n overwrite)

Put all systemd files except cportal.service on /usr/bin

then chmod +777 /usr/bin/*.sh && chmod +777 /usr/bin/*.php

then copy cportal.service && phpcgi.service from systemd folder to /etc/systemd/system*

then enable using systemctl enable cportal.service && systemctl enable phpcgi.service

restart system and after restart create Admin user account in localhost/admin and enjoy



# ISSUE

Traffic controll does not included 

# PreloadedOS

A preloaded Iso image with cinnamon gui available:-https://mega.nz/file/ZJslBR5B#ldyeKRznju-WHOm3y87hoWuSUm-cqDTIb_r4s7MCGdU

Default user root password toor
burn the iso or mount on vm then enter live, from terminal use command uli (universal linux installer) and follow the instruction

kernel 5.5.5 && runtime deps are required so select y on install and setup requires to sccess debian repo 
 


