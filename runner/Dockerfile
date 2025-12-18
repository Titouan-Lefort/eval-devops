FROM debian

RUN apt-get update
RUN apt-get install curl -y
RUN apt-get install libkrb5-3 -y
RUN apt-get install zlib1g -y
RUN apt-get install libssl3 -y
RUN apt-get install ca-certificates -y
RUN apt-get install jq -y
RUN apt-get install libicu-dev -y
RUN install -m 0755 -d /etc/apt/keyrings
RUN curl -fsSL https://download.docker.com/linux/debian/gpg -o /etc/apt/keyrings/docker.asc
RUN chmod a+r /etc/apt/keyrings/docker.asc
RUN tee /etc/apt/sources.list.d/docker.sources <<EOF
Types: deb
URIs: https://download.docker.com/linux/debian
Suites: $(. /etc/os-release && echo "$VERSION_CODENAME")
Components: stable
Signed-By: /etc/apt/keyrings/docker.asc
EOF
RUN apt-get update
RUN apt install docker-ce -y

CMD [ "bash" ]


