#!/bin/bash
sudo yum update -y && sudo yum install docker -y
sudo usermod -a ec2-user -G docker

sudo systemctl start docker
sudo systemctl enable docker

docker run -d -p 8080:80 nginx:1.23-alpine