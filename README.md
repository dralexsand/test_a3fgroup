Tests A3FGroup

```
git git@github.com:dralexsand/test_a3fgroup.git

cd test_a3fgroup
```
Test Тестовое задание 3.docx
```
cd app
cp .env.exampl .env
docker-compose up --build -d
docker exec -it parsertags_backend bash
composer install
php parsertag <<url>>

```
Test fullst. developer - тестовое задание A3F.docx
```
cd frontend
npm install
npm run dev

http://localhost:5173/
```

