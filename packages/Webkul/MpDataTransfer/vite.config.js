import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig(({ mode }) => {
    const envDir = "../../..";

    Object.assign(process.env, loadEnv(mode, envDir));

    return {
        build: {
            emptyOutDir: true,
        },
        envDir,
        server: {
            host: process.env.VITE_HOST || "localhost",
            port: process.env.VITE_PORT || 5174,
        },
        plugins: [
            laravel({
                hotFile: "../../../public/mp_data_transfer-vite.hot",
                publicDirectory: "publishable",
                buildDirectory: "build",
                input: [
                    "src/Resources/assets/css/mpdata.css",
                ],
                refresh: true,
            }),
        ],
        experimental: {
            renderBuiltUrl(filename, { hostId, hostType, type }) {
                if (hostType === "css") {
                    return path.basename(filename);
                }
            },
        },
    }
});
