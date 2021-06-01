# Exercice 1 - 1 container :  HTTP

Il faut créer les 3 nodes (éventuellement il faut les supprimer avant avec docker-machine rm node)
```
docker-machine create node_1
docker-machine create node_2
docker-machine create node_3
```


On récupère ensuite l'ip pour s'y connecter en SSH et instancier swarm
```
docker-machine ip node_1
docker-machine ssh node_1
docker swarm init 
```

Ensuite, on se connecte sur les autres nodes pour le "join" au premier.
```
docker-machine ssh node_2
docker swarm init 
docker swarm join --token SWMTKN-1-3pu6hszjas19xyp7ghgosyx9k8atbfcr8p2is99znpy26u2lkl-1awxwuwd3z9j1z3puu7rcgdbx

docker-machine ssh node_3
docker swarm init 
docker swarm join --token SWMTKN-1-3pu6hszjas19xyp7ghgosyx9k8atbfcr8p2is99znpy26u2lkl-1awxwuwd3z9j1z3puu7rcgdbx
```


On retourne dans le premier node pour instancier http
```
docker-machine ssh node_1
docker service create --replicas 1 -p 8080:80 --name http nginx
docker service scale http=2
docker service scale http=3
```

Ensuite aller sur 192.168.99.83:8080 pour voir le résultat.