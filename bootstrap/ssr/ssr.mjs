import { jsx } from "react/jsx-runtime";
import ReactDOMServer from "react-dom/server";
import { createInertiaApp } from "@inertiajs/react";
import createServer from "@inertiajs/react/server";
import route from "ziggy-js";
async function resolvePageComponent(path, pages) {
  const page = pages[path];
  if (typeof page === "undefined") {
    throw new Error(`Page not found: ${path}`);
  }
  return typeof page === "function" ? page() : page;
}
const appName = {}.VITE_APP_NAME || "Laravel";
createServer(
  (page) => createInertiaApp({
    page,
    render: ReactDOMServer.renderToString,
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.tsx`, /* @__PURE__ */ Object.assign({ "./Pages/AboutUs.tsx": () => import("./assets/AboutUs-de0477b2.mjs"), "./Pages/About_us.tsx": () => import("./assets/About_us-a2b8673e.mjs"), "./Pages/Auth/Login.tsx": () => import("./assets/Login-fdd0a9f7.mjs"), "./Pages/Auth/Register.tsx": () => import("./assets/Register-e322a12c.mjs"), "./Pages/Blog.tsx": () => import("./assets/Blog-5c3cf340.mjs"), "./Pages/BlogSingle.tsx": () => import("./assets/BlogSingle-d8e64155.mjs"), "./Pages/CardShare.tsx": () => import("./assets/CardShare-9401c623.mjs"), "./Pages/ContactUs.tsx": () => import("./assets/ContactUs-41ba3077.mjs"), "./Pages/Home.tsx": () => import("./assets/Home-f5ad7696.mjs"), "./Pages/Playground.tsx": () => import("./assets/Playground-94fd8430.mjs"), "./Pages/Pricing.tsx": () => import("./assets/Pricing-c463f91b.mjs") })),
    setup: ({ App, props }) => {
      global.route = (name, params, absolute) => route(name, params, absolute, {
        // @ts-expect-error
        ...page.props.ziggy,
        // @ts-expect-error
        location: new URL(page.props.ziggy.location)
      });
      return /* @__PURE__ */ jsx(App, { ...props });
    }
  })
);
