# Exercice 4 - 3 containers avec Docker Compose : HTTP + SCRIPT + BDD

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

Ensuite on doit placer notre exercice en local sur le node_1 :
```
docker-machine scp -r ./Ex4/ node_1:~/
docker-machine ssh node_1
cd Ex4
docker image build -t Ex4 .
docker stack deploy -c docker-compose.yml Ex4
```

Ensuite aller sur 192.168.99.83:8080 pour voir le résultat.