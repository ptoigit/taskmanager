#!/bin/bash

# Stop dan hapus container lama (jika ada)
docker stop taskmanager 2>/dev/null || true
docker rm taskmanager 2>/dev/null || true

# Jalankan container baru
docker run -d -p 8888:80 --name taskmanager taskmanager-image

