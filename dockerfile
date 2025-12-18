FROM debian

WORKDIR /app
RUN apt-get update && apt-get install wget -y
RUN wget https://packages.microsoft.com/config/debian/13/packages-microsoft-prod.deb -O packages-microsoft-prod.deb
RUN dpkg -i packages-microsoft-prod.deb
RUN rm packages-microsoft-prod.deb
RUN apt-get update && apt-get install -y aspnetcore-runtime-9.0
RUN apt install curl -y

WORKDIR /app

COPY ./bin/Debug/net9.0/ .

RUN chmod +x demo

CMD [ "./demo" ]

EXPOSE 8080
