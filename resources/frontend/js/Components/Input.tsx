import React, {InputHTMLAttributes} from "react";

const TextInput: React.FC<InputHTMLAttributes<HTMLInputElement>> = ({type = 'text', className = '', ...props}) => {
  return (
    <input
      {...props}
      type={type}
      className={'text-[1.25rem] px-8 py-4 border border-gray-300 rounded-2xl shadow-sm focus:outline-none focus:ring-1 focus:ring-[#2273AF] focus:border-[#2273AF] '+ className}
    />
  );
}

export default TextInput;
