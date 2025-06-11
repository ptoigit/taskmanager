# Build image dari Dockerfile
docker build -t taskmanager-image .

# Jalankan container dengan port 8888 (ganti sesuai kebutuhan)
docker run -d -p 8888:80 --name taskmanager taskmanager-image

