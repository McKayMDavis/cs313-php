args <- commandArgs(TRUE)
cat("R Script in progress")
data <- read.csv("/app/web/prove_05/temp.csv")

png(filename = "/app/web/prove_05/temp.png", width = 200, height = 200)
plot(data$date_entered, data$amount)
dev.off()