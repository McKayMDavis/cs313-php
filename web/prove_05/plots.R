args <- commandArgs(TRUE)
data <- read.csv("/app/web/prove_05/temp.csv")

library(tidyverse)
p <- data %>% 
  ggplot(aes(x = date_entered, y = amount)) +
  geom_point()
ggsave("temp.png", p, "png", "/app/web/prove_05/")

# png(filename = "/app/web/prove_05/temp.png", width = 500, height = 500)
# plot(data$date_entered, data$amount)
# dev.off()