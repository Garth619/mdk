const merge=require("webpack-merge"),BundleAnalyzerPlugin=require("webpack-bundle-analyzer").BundleAnalyzerPlugin,devBase=require("./configs/dev-base.js"),entry=require("./entry/admin"),externals=require("./externals/admin"),sc=require("./optimization/split-chunks"),config=require("./config");module.exports=merge.strategy({optimization:"append",plugins:"append"})(devBase,{entry:entry,externals:externals,optimization:{splitChunks:sc.scAdmin},output:{path:config.paths.dist},plugins:[new BundleAnalyzerPlugin({analyzerMode:"static",reportFilename:config.paths.reports.replace("%s","admin-bundle"),openAnalyzer:!1})]});