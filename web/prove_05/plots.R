args <- commandArgs(TRUE)
data <- read.csv("/app/web/prove_05/temp.csv")

library(tidyverse)
p <- data %>% 
  ggplot(aes(x = date_entered, y = amount)) +
  geom_point()
ggsave(plot = p, filename = "temp.png", path = "/app/web/prove_05/", width = 600, height = 400)
