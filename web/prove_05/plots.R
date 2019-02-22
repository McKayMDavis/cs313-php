args <- commandArgs(TRUE)
data <- read.csv("/app/web/prove_05/temp.csv")

library(tidyverse)
p <- data %>%
  ggplot(aes(x = date_entered, y = amount, fill = date_entered)) +
  geom_boxplot() +
  theme_bw()


tryCatch(ggsave("temp.png", p, "png", "/app/web/prove_05/", height = 6, width = 10)
, warning = function(w) {
  cat(w)
}, error = function(e) {
  cat(e)
})


# png(filename = "/app/web/prove_05/temp.png", width = 500, height = 500)
# plot(data$date_entered, data$amount)
# dev.off()