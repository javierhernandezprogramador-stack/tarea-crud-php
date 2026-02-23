FROM php:8.2-apache

# TAREAS 1
RUN docker-php-ext-install mysqli pdo pdo_mysql

# TAREA 2 INSTALAR SERVIDOR SSH
RUN apt-get update && apt-get install -y openssh-server

# TAREA 3 configuracion ssh

RUN mkdir -p /var/run/sshd
RUN echo 'root:root' | chpasswd
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config


# permitir login por password
RUN sed -i 's/#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config

#Exponer puerto ssh??? 22
EXPOSE 22

#INICIAR EL CONTAINER
CMD service ssh start && apache2-foreground
