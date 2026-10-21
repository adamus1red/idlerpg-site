FROM php:8-apache@sha256:47e6d8849049375e0d19e81f1b391ed88828d4653e0d1b00822185b66b564e8b

LABEL maintainer="@adamus1red <noreply@example.com>" \
      org.label-schema.build-date="${BUILD_DATE}" \
      org.label-schema.name="IdleRPG_Site" \
      org.label-schema.description=" \
        IdleRPG Site. A modern redesign \
        For stand-alone or compose/stack service use." \
      org.label-schema.url="https://github.com/adamus1red/idlerpg-site" \
      org.label-schema.vcs-url="https://github.com/adamus1red/idlerpg-site" \
      org.label-schema.schema-version="1.0" \
      dockerfile.vcs-url="https://github.com/adamus1red/idlerpg-site" 

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev libpng-dev && \
    docker-php-ext-install gd

COPY src /var/www/html

EXPOSE 80
