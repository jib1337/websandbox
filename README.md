# Vulnerable Web Sandbox | Jack Nelson, 2020
## WARNING: Do not expose this to the internet or any public network.

A small forum site for testing several different basic web attacks.

## A few possible attacks
- Reflected/stored XSS
- SQL injection
- File upload exploits
- Online/offline password attacks

## Usage 
1. Clone the repo: `git clone https://github.com/jib1337/websandbox`
2. Set the setup script execute permissions: `cd websandbox; chmod +x setup.sh`
3. Run the setup script: `./setup.sh`
  
Note: You will require adequate permissions to create and run mysql databases, as well as a PHP server.  
If neccesary, run as root (remembering the "don't connect to a public network" part of course):
`sudo ./setup.sh`

### Dependancies:
* mysql
* mysql php module
* php

## Docker
It is also now possible to start up the site in Docker containers.  
Please remember that this doesn't add any extra security so the above warnings still apply.
Should work by running `docker compose up --build`
