# teste-santri

Para iniciar o projeto basta rodar o docker composer na pasta raiz.
```
docker-compose -f "docker-compose.yml" up -d --build
```
Em seguida acessar a url: [http://localhost:9000](http://localhost:9000)

O docker compose irá criar 3 dockers:
 - *santri_db*: Servidor de banco de dados usando MySql
 - *santri_web*: Servidor Web usando Nginx
 - *santri_app*: Servidor de aplicação
 
 ## Observações sobre o projeto
 Esse projeto foi desenvolvido com conceitos da arquitetura MVC sem utilizar nenhum tipo de framework, apenas PHP puro. O objetivo de não utilizar nenhum framework foi para demostrar meus conhecimentos sobre arquitetura.
