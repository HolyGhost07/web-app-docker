FROM nginx:1.13.12-alpine

RUN apk add --no-cache openssl

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz

RUN rm -rf /etc/nginx/conf.d

COPY nginx/upstreams.d /etc/nginx/upstreams.d
COPY nginx/conf.d /etc/nginx/conf.d
COPY nginx/nginx.conf /etc/nginx/nginx.conf

ARG PROJECT_DIR
ARG SRC_DIR

COPY ${SRC_DIR} ${PROJECT_DIR}

EXPOSE 80

CMD ["dockerize", "-template", "/etc/nginx/conf.d/frontend.tmpl:/etc/nginx/conf.d/frontend.conf", "-stdout", "/var/log/nginx/access.log", "-stderr", "/var/log/nginx/error.log", "nginx"]
