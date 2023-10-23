import { jsxs, jsx } from "react/jsx-runtime";
import { Head } from "@inertiajs/react";
import { L as LandingLayout } from "./LandingLayout-9a0f5d69.mjs";
import "react";
import "@headlessui/react";
import "@heroicons/react/24/outline";
function Blog({}) {
  return /* @__PURE__ */ jsxs(LandingLayout, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Welcome" }),
    /* @__PURE__ */ jsxs(Section, { children: [
      /* @__PURE__ */ jsx("div", { className: "mt-16 text-center text-7xl font-extrabold text-[#2273AF]", children: "Blog" }),
      /* @__PURE__ */ jsx(PostGrid, { posts })
    ] })
  ] });
}
const posts = [
  {
    id: 1,
    title: "Boost your conversion rate",
    href: "#",
    description: "Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.",
    imageUrl: "https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80",
    date: "Mar 16, 2020",
    datetime: "2020-03-16",
    category: { title: "Marketing", href: "#" },
    author: {
      name: "Michael Foster",
      role: "Co-Founder / CTO",
      href: "#",
      imageUrl: "https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
    }
  },
  {
    id: 2,
    title: "Boost your conversion rate",
    href: "#",
    description: "Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.",
    imageUrl: "https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3270&q=80",
    date: "Mar 16, 2020",
    datetime: "2020-03-16",
    category: { title: "Marketing", href: "#" },
    author: {
      name: "Michael Foster",
      role: "Co-Founder / CTO",
      href: "#",
      imageUrl: "https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
    }
  },
  {
    id: 3,
    title: "Boost your conversion rate",
    href: "#",
    description: "Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.",
    imageUrl: "https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3270&q=80",
    date: "Mar 16, 2020",
    datetime: "2020-03-16",
    category: { title: "Marketing", href: "#" },
    author: {
      name: "Michael Foster",
      role: "Co-Founder / CTO",
      href: "#",
      imageUrl: "https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
    }
  }
  // More posts...
];
const Section = ({ children, className }) => {
  return /* @__PURE__ */ jsx("div", { className: `min-h-screen h-full flex flex-col ${className}`, children: /* @__PURE__ */ jsx("div", { className: "flex-1 py-24 mx-auto max-w-7xl w-full min-h-full", children }) });
};
const BlogPostCard = ({ post }) => {
  return /* @__PURE__ */ jsxs("article", { className: "flex flex-col items-start justify-between", children: [
    /* @__PURE__ */ jsxs("div", { className: "relative w-full", children: [
      /* @__PURE__ */ jsx(
        "img",
        {
          src: post.imageUrl,
          alt: "",
          className: "aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]"
        }
      ),
      /* @__PURE__ */ jsx("div", { className: "absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10" })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "max-w-xl", children: [
      /* @__PURE__ */ jsxs("div", { className: "mt-8 flex items-center gap-x-4 text-xs", children: [
        /* @__PURE__ */ jsx("time", { dateTime: post.datetime, className: "text-gray-500", children: post.date }),
        /* @__PURE__ */ jsx(
          "a",
          {
            href: post.category.href,
            className: "relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100",
            children: post.category.title
          }
        )
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "group relative", children: [
        /* @__PURE__ */ jsx("h3", { className: "mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600", children: /* @__PURE__ */ jsxs("a", { href: post.href, children: [
          /* @__PURE__ */ jsx("span", { className: "absolute inset-0" }),
          post.title
        ] }) }),
        /* @__PURE__ */ jsx("p", { className: "mt-5 line-clamp-3 text-sm leading-6 text-gray-600", children: post.description })
      ] })
    ] })
  ] }, post.id);
};
const PostGrid = ({ posts: posts2 }) => {
  return /* @__PURE__ */ jsx("div", { className: "mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3", children: posts2.map((post) => /* @__PURE__ */ jsx(BlogPostCard, { post }, post.id)) });
};
export {
  Blog as default
};
