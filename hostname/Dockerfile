# docker build -t pfinal/hostname . 
FROM golang:alpine AS builder
ADD main.go /go
RUN CGO_ENABLED=0 go build -o main

FROM scratch
WORKDIR /
COPY --from=builder /go/main /main
EXPOSE 80
ENTRYPOINT ["/main"]
