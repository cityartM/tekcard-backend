import { ImgHTMLAttributes } from 'react';
import Logo from '../../images/logo.png';

export default function ApplicationLogo(props: ImgHTMLAttributes<HTMLImageElement>) {
  return (
    <img src={Logo} alt='Logo' {...props}/>
  );
}

