import { jsx } from "react/jsx-runtime";
const TextInput = ({ type = "text", className = "", ...props }) => {
  return /* @__PURE__ */ jsx(
    "input",
    {
      ...props,
      type,
      className: "text-[1.25rem] px-8 py-4 border border-gray-300 rounded-2xl shadow-sm focus:outline-none focus:ring-1 focus:ring-[#2273AF] focus:border-[#2273AF] " + className
    }
  );
};
const TextInput$1 = TextInput;
export {
  TextInput$1 as T
};
