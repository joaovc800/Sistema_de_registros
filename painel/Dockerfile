FROM ubuntu:focal

RUN apt-get update
RUN apt-get install -y wget \
    lsb-release \
    apt-utils
    
RUN wget https://raw.githubusercontent.com/hestiacp/hestiacp/release/install/hst-install.sh
RUN yes | bash hst-install.sh

CMD ["sleep", "infinity"]