# Usar una imagen base de Node.js
FROM node:18

# Establecer el directorio de trabajo
WORKDIR /usr/src/frontend

# Copiar los archivos del frontend
COPY ./frontend /usr/src/frontend

# Instalar las dependencias
RUN npm install

# Crear una build de la aplicación
RUN npm run build

# Exponer el puerto 3000 para desarrollo (React)
EXPOSE 3000

# Comando para ejecutar la aplicación en modo desarrollo
CMD ["npm", "start"]
