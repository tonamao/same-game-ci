## SameGame
SameGame is web apllication game.

## How to start
### Premise
Install docker, docker-compose.

### Start SameGame
1. git clone this repository.

2. cp env .env
If in any server, fix server host `SAMEGAME_MY_SERVER_HOST` in .env file.

3. start with `docker-compose up -d`.

4. access to `http://localhost:8080/SameGame`

### Start SameGame with support-tool application
git clone this and support-tool.

$ tree
./
├─same-game-ci
│   ├ dockre-compose_all.yml
│   └ docker-compose.yml
└─ support-tool

Start applications with support-tool with the following command.
`docker-compose -f docker-compose_all.yml up -d`


