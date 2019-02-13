args <- commandArgs(TRUE)
data <- read.csv("/app/web/prove_05/temp.csv")

library(tidyverse)
p <- data %>% 
  ggplot(aes(x = date_entered, y = amount)) +
  geom_point()
png(filename = "/app/web/prove_05/temp.png", width = 500, height = 500)
p
dev.off()