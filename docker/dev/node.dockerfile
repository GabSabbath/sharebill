FROM node:24-alpine

WORKDIR /usr/src/app
RUN apk add --no-cache git

CMD ["tail", "-f", "/dev/null"]

