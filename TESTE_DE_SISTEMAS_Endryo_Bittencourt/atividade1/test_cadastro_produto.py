from selenium import webdriver
from selenium.webdriver.common.by import By
import time

driver = webdriver.Chrome()

driver.get("file:///C:/Users/endryo_bittencourt/Documents/GitHub/EndryoBittencourt_Desen_sistemas_Tarde/TESTE_DE_SISTEMAS_Endryo_Bittencourt/atividade1/produto.html")

cod_input = driver.find_element(By.ID, "cod")
cod_input.send_keys("12345")

desc_input = driver.find_element(By.ID, "desc")
desc_input.send_keys("Um belo produto")

marc_input = driver.find_element(By.ID, "marc")
marc_input.send_keys("Abidas")

preco_input = driver.find_element(By.ID, "preco")
preco_input.send_keys("$500,00")

quant_input = driver.find_element(By.ID, "quant")
quant_input.send_keys("25")

time.sleep(2)

submit_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
submit_button.click()

time.sleep(2)

driver.quit()
