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
    resolve: (name) => resolvePageComponent(`./Pages/${name}.tsx`, /* @__PURE__ */ Object.assign({ "./Pages/AboutUs.tsx": () => import("./assets/AboutUs-0f176196.mjs"), "./Pages/About_us.tsx": () => import("./assets/About_us-9389e012.mjs"), "./Pages/Auth/Login.tsx": () => import("./assets/Login-fdd0a9f7.mjs"), "./Pages/Auth/Register.tsx": () => import("./assets/Register-e322a12c.mjs"), "./Pages/Blog.tsx": () => import("./assets/Blog-0a2008ae.mjs"), "./Pages/BlogSingle.tsx": () => import("./assets/BlogSingle-5f1b173a.mjs"), "./Pages/CardShare.tsx": () => import("./assets/CardShare-3a0ac4d7.mjs"), "./Pages/ContactUs.tsx": () => import("./assets/ContactUs-28fb2177.mjs"), "./Pages/Home.tsx": () => import("./assets/Home-38dee8f3.mjs"), "./Pages/Playground.tsx": () => import("./assets/Playground-94fd8430.mjs"), "./Pages/Pricing.tsx": () => import("./assets/Pricing-2bdf9d76.mjs") })),
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
