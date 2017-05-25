FROM nginx:latest

RUN rm -rf /etc/nginx/conf.d

COPY nginx/nginx.conf /etc/nginx/nginx.conf
COPY code/. /data/projects/project/.

EXPOSE 8080
