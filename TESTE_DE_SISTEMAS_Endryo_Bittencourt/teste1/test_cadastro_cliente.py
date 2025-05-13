from selenium import webdriver
from selenium.webdriver.common.by import By
import time

#config do webdriver (chrome)
driver = webdriver.Chrome()

#Acessa a pagina de cadastro usando o caminho absoluto com o protocolo file:///C
#Certifique se de que o caminho esta apontando para um arquivo HTML especifico
driver.get("file:///C:/Users/endryo_bittencourt/Documents/GitHub/EndryoBittencourt_Desen_sistemas_Tarde/TESTE_DE_SISTEMAS_Endryo_Bittencourt/teste1/index.html")

#Preenche o campo Nome
nome_input = driver.find_element(By.ID,"name")
nome_input.send_keys("João da Silva")

#Preenche o campo cpf
cpf_input = driver.find_element(By.ID,"cpf")
cpf_input.send_keys("12345678911")

#Preenche o campo endereço
endereco_input = driver.find_element(By.ID,"address")
endereco_input.send_keys("Rua das Flores, 123")

#Preenche o campo telefone
telefone_input = driver.find_element(By.ID,"phone")
telefone_input.send_keys("11987654321")

#clica no botão de Cadastrar
submit_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
submit_button.click()

#aguarda um momento para visualizar o resultado (em uma aplicaçao real, voce verificaria a resposta)
time.sleep(2)

#fecha o navegador
driver.quit()