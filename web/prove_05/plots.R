args <- commandArgs(TRUE)
library(here)
data <- read.csv(here("temp.csv"))

png(filename = here("temp.png"), width = 200, height = 200)
plot(data$date_entered, data$amount)
dev.off()