dev.off.wrap <- function(){
  dev.off()
  invisible()
}

bitmap(file = "%stdout", type="png256")
pie(rep(1, 24), col = rainbow(24))
dev.off.wrap()