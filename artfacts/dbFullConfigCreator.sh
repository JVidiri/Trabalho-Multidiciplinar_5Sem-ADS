#!/bin/bash
#This is a shell script to create a complete configuration file of the database 
#and recriates it

echo 'USE IFSP' > completeAkkoConfig.sql

cat dropDatabase.sql >> completeAkkoConfig.sql
echo $'\n' >> completeAkkoConfig.sql
cat createDatabaseTables.sql >> completeAkkoConfig.sql
echo $'\n' >> completeAkkoConfig.sql
cat insertDatabaseTest.sql >> completeAkkoConfig.sql
echo $'\n' >> completeAkkoConfig.sql
cat createDatabaseArtfacts.sql >> completeAkkoConfig.sql
echo $'\n' >> completeAkkoConfig.sql

mysql -u root -p < completeAkkoConfig.sql

if [ $? -eq 0 ]
then
	echo "Banco criado com sucesso."
fi